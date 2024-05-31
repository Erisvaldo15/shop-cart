export default class Validate {
    #regexForEmail =
        /^[A-Za-z0-9!#$%&'*+/=?^_`{|}~-]+(?:.[A-Za-z0-9!#$%&'*+/=?^_`{|}~-]+)*@[A-Za-z0-9.-]+.[A-Za-z]{2,}$/;
    errors = [];

    validate(rules, value) {

        this.errors = [];
    
        let splittedRules = rules.split('|');

        splittedRules.some((rule) => {
            let result = null;

            switch (rule) {
                case 'required':
                    result = this.#required(value);
                    result !== true ? this.errors.push(result) : '';
                    break;
                case 'email':
                    result = this.#email(value);
                    result !== true ? this.errors.push(result) : '';
                    break;
                case 'password':
                    result = this.#password(value);
                    result !== true ? this.errors.push(result) : '';
                    break;
                case 'name':
                    result = this.#name(value);
                    result !== true ? this.errors.push(result) : '';
                    break;
                default:
                    result = true;
                    break;
            }
        });

        return this.errors;
    }

    #required(value) {
        return value ? true : 'Required field';
    }

    #email(value) {
        return !this.#regexForEmail.test(value) ? 'E-mail invalid' : true;
    }

    #password(value) {
        return value.length >= 8
            ? true
            : 'Passoword must have at least 8 characters';
    }

    #name(value) {
        return value >= 3 ? true : 'Name must have at least 3 characters';
    }
}
