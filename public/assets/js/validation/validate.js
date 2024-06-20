export default class Validate {
    #regexForEmail =
        /^[A-Za-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[A-Za-z0-9!#$%&'*+/=?^_`{|}~-]+)*@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
    errors = [];

    validate(rules, value) {

        let result = null;
        let splittedRules = rules.split('|');

        for (const rule of splittedRules) {
            switch (rule) {
                case 'required':
                    result = this.#required(value);
                    break;
                case 'email':
                    result = this.#email(value);
                    break;
                case 'password':
                    result = this.#password(value);
                    break;
                case 'name':
                    result = this.#name(value);
                    break;
            }

            if (result !== true) {
                break;
            }
        }

        return result;
    }

    #required(value) {
        return value ? true : 'Required Field';
    }

    #email(value) {
        return !this.#regexForEmail.test(value) ? 'Email Invalid' : true;
    }

    #password(value) {
        return value.length >= 8
            ? true
            : 'Password must have at least 8 characters';
    }

    #name(value) {
        return value.length >= 3
            ? true
            : 'Name must have at least 3 characters';
    }
}
