<section id="contact">
    <div id="contact-container">
        <div class="form-image">
            <img src="assets/img/contact-mail.svg" alt="image of contact">
        </div>
        <div class="form-div">
            <div id="title">
                <img src="/assets/img/icons/log-in.svg" alt="Website logo"> 
                <h1> Contact </h1>
            </div>
            <form action="/send/email" method="post">
                <div class="fields">
                    <label for="name"> Your Name </label>
                    <input type="text" name="name" placeholder="Type your name" id="name" value="">
                </div>
                <div class="fields">
                    <label for="email"> Your E-mail </label>
                    <input type="email" name="email" placeholder="Type your email" id="email" value="">
                </div>
                <div class="fields">
                    <label for="subject"> Subject </label>
                    <input type="text" name="subject" placeholder="Type your subject" id="subject" value="">
                </div>
                <div class="fields">
                    <label for="message"> Message </label>
                    <textarea name="message" placeholder="Type your message" id="message"></textarea>
                </div>
               
                <button type="submit" class="form-button"> Send e-mail </button>
            </form>
        </div>
    </div>
</section>