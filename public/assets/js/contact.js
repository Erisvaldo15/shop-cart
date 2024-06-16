import Validate from './validation/validate.js';

export default function sendContact() {
    const contactForm = document.querySelector('#contact-form') ?? null;

    if (contactForm) {

        contactForm.addEventListener('submit', async (event) => {

            event.preventDefault();

            const nameInput = document.querySelector('#contact-name');
            const emailInput = document.querySelector('#contact-email');
            const subjectInput = document.querySelector('#contact-subject');
            const messageInput = document.querySelector('#contact-message');

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
                subject:
                    validationClass.validate(
                        'required',
                        subjectInput.value
                    )[0] ?? null,
                message:
                    validationClass.validate(
                        'required',
                        messageInput.value
                    )[0] ?? null,
            };

            for (const prop in firstFoundError) {
                let label = document.querySelector(
                    `label[for="contact-${prop}"]`
                );

                if (firstFoundError[prop] === null) {
                    label.textContent = `${prop
                        .charAt(0)
                        .toUpperCase()}${prop.slice(1)}`;
                    label.style.color = '#000000';
                } else {
                    label.textContent = firstFoundError[prop];
                    label.style.color = '#000000';
                }
            }

            if (validationClass.errors.length > 0) return;

            console.log('here')

            try {
                const requestSettings = new Request('http://localhost:8000/send/contact', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        name: nameInput.value,
                        email: emailInput.value,
                        subject: subjectInput.value,
                        message: messageInput.value,
                    }),
                });

                let resultOfSent = await fetch(requestSettings);
                resultOfSent = await resultOfSent.json();

                console.log(resultOfSent);

            } catch (error) {
                console.log("Error to sent contact", error);
            }
        });
    }
}