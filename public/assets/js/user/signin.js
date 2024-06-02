import Validate from '../validation/validate.js';

export default function signIn() {
    const formOfSignIn = document.querySelector('#signin') ?? null;

    if (formOfSignIn) {
        formOfSignIn.addEventListener('submit', async (event) => {
            event.preventDefault();

            const emailInput = document.querySelector('#emailForSignIn');
            const passwordInput = document.querySelector('#passwordForSignIn');

            const validationClass = new Validate();

            let firstFoundError = {
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
                    `label[for="${prop}ForSignIn"]`
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
                    'http://localhost:8000/signin/store',
                    {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            email: emailInput.value,
                            password: passwordInput.value,
                        }),
                    }
                );

                let loggedOrNot = await fetch(requestSettings);
                loggedOrNot = await loggedOrNot.json();

                let notyf = new Notyf({
                    position: {
                        x: 'right',
                        y: 'top',
                    },
                    duration: 1800,
                });

                if (loggedOrNot.success === true) {
                    notyf.success(loggedOrNot.message);
                    setTimeout(() => (window.location.href = '/travels'), 2300);
                } else {
                    notyf.error(loggedOrNot.message);
                }
            } catch (error) {
                console.log('Error to sign in', error);
            }
        });
    }
}
