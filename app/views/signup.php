<section class="form-section">
    <header class="form-header">
        <div class="logo">
            <img src="/assets/img/icons/logo.svg" alt="Website icon">
            <a href="/"> Diary </a>
        </div>
    </header>
    <div class="form-div">
        <div class="title">
            <img src="/assets/img/icons/log-in.svg" alt="Sign Up Icon">
            <h1> Make your registration </h1>
        </div>
        <form action="/signup/store" method="post">
            <div class="fields">
                <label> Name </label>
                <input type="text" name="name" placeholder="Type your name">           
            </div>
            <div class="fields">
                <label> E-mail </label>
                <input type="email" name="email" placeholder="Type your e-mail">        
            </div>
            <div class="fields">
                <label> Password </label>
                <input type="password" name="password" placeholder="Type your password">     
            </div>
            <button type="submit" class="form-button"> Sign Up </button>
            <a href="/signin" class="other-link"> Already have an account? <span> SignIn </span> </a>
        </form>
</section>
<section class="image"></section>