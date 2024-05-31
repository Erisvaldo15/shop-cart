import Validate from "../validation/validate.js";

export default function signIn() {
    const form = document.querySelector("#signin") ?? null;

    if (form) {
        const emailInput = document.querySelector("#emailForSignIn");
        const passwordInput = document.querySelector("#passwordForSignIn");

        form.addEventListener("submit", async (event) => {
            event.preventDefault();

            const validationClass = new Validate();

            let firstFoundError = {
                email:
                    validationClass.validate(
                        "required|email",
                        emailInput.value
                    )[0] ?? null,
                password:
                    validationClass.validate(
                        "required|password",
                        passwordInput.value
                    )[0] ?? null,
            };

            for (const prop in firstFoundError) {

                let label = document.querySelector(
                    `label[for="${prop}ForSignIn"]`
                );

                if (firstFoundError[prop] === null) {
                    label.textContent = `${prop.charAt(0).toUpperCase()}${prop.slice(1)}`;
                    label.style.color = "#AFB6C2";

                } else {
                    label.textContent = firstFoundError[prop];
                    label.style.color = "#FFC632";
                }
            }

            if(validationClass.errors.length > 0) return;

            try {
                const requestSettings = new Request(
                    "http://localhost:8000/signin/store",
                    {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify([emailInput.value, passwordInput.value]),
                    }
                );

                let loggedOrNot = await fetch(requestSettings);
                loggedOrNot = await loggedOrNot.json();

                if(loggedOrNot.success === true) {
                    let notyf = new Notyf({
                        position: {
                            x: "right",
                            y: "top",
                          },
                          duration: 1500,
                    });
                    notyf.success(loggedOrNot.message);

                    setTimeout(() => window.location.href = '/', 2500);
                }

            } catch (error) {
                console.log("Error to sign in", error);
            }
        });
    }
}
