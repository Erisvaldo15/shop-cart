import Validate from '../validation/validate.js';

export default function signUp() {
    const formOfSignUp = document.querySelector('#signup') ?? null;

    if (formOfSignUp) {
        formOfSignUp.addEventListener('submit', async (event) => {
            event.preventDefault();

            const nameInput = document.querySelector('#signup-name');
            const emailInput = document.querySelector('#signup-email');
            const passwordInput = document.querySelector('#signup-password');

            const validationClass = new Validate();

            let firstFoundError = {
                name:
                    validationClass.validate(
                        'required|name',
                        nameInput.value
                    ),
                email:
                    validationClass.validate(
                        'required|email',
                        emailInput.value
                    ),
                password:
                    validationClass.validate(
                        'required|password',
                        passwordInput.value
                    ),
            };

            let isThereError = false;

            for (const prop in firstFoundError) {
                let label = document.querySelector(
                    `label[for="signup-${prop}"]`
                );

                if (firstFoundError[prop] === true) {
                    label.textContent = `${prop
                        .charAt(0)
                        .toUpperCase()}${prop.slice(1)}`;
                    label.style.color = '#AFB6C2';
                } else {
                    label.textContent = firstFoundError[prop];
                    label.style.color = '#FFC632';
                    isThereError = true;
                }
            }
  
            if (isThereError) return;

            try {
                const requestSettings = new Request(
                    'http://localhost:8000/signup/store',
                    {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            name: nameInput.value, 
                            email: emailInput.value, 
                            password: passwordInput.value,
                        }),
                    }
                );

                let resultOfRegister = await fetch(requestSettings);
                resultOfRegister = await resultOfRegister.json();

                let notyf = new Notyf({
                    position: {
                        x: "right",
                        y: "top",
                      },
                      duration: 1800,
                });

                if(resultOfRegister.success === true) {
                    notyf.success(resultOfRegister.message)
                    setTimeout(() => window.location.href = '/travels', 2300);
                }

                else {
                    notyf.error(resultOfRegister.message);
                }

            } catch (error) {
                console.log("Error to register", error);
            }
        });
    }
}
