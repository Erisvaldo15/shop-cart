import Validate from '../validation/validate.js';

export default function signUp() {
    const formOfSignUp = document.querySelector('#signup') ?? null;

    if (formOfSignUp) {
        formOfSignUp.addEventListener('submit', async (event) => {
            event.preventDefault();

            const nameInput = document.querySelector('#nameForSignUp');
            const emailInput = document.querySelector('#emailForSignUp');
            const passwordInput = document.querySelector('#passwordForSignUp');

            const validationClass = new Validate();

            let firstFoundError = {
                name:
                    validationClass.validate(
                        'required|name',
                        nameInput.value
                    )[0] ?? null,
                email:
                    validationClass.validate(
                        'required|email',
                        emailInput.value
                    )[0] ?? null,
                password:
                    validationClass.validate(
                        'required|password',
                        passwordInput.value
                    )[0] ?? null,
            };

            for (const prop in firstFoundError) {
                let label = document.querySelector(
                    `label[for="${prop}ForSignUp"]`
                );

                if (firstFoundError[prop] === null) {
                    label.textContent = `${prop
                        .charAt(0)
                        .toUpperCase()}${prop.slice(1)}`;
                    label.style.color = '#AFB6C2';
                } else {
                    label.textContent = firstFoundError[prop];
                    label.style.color = '#FFC632';
                }
            }

            if (validationClass.errors.length > 0) return;

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
