<section class="form-section">
    <header class="form-header">
        <div class="logo">
            <img src="/assets/img/icons/logo.svg" alt="Website icon">
            <a href="/"> Diary </a>
        </div>
    </header>
    <div class="form-div">
        <div class="title">
            <img src="/assets/img/icons/log-in.svg" alt="Website logo"> 
            <h1> Login </h1>
        </div>
        <div class="subtitle">
            <p> Enter your information registration </p>
        </div>
        <form action="/signin/store" method="post">
            <div class="fields">
                <label> E-mail </label>
                <input type="email" name="email" placeholder="Type your e-mail" value="">
            </div>
            <div class="fields" id="password">
                <label> Password </label>
                <input type="password" name="password" placeholder="Type your password" value="">
            </div>
            <div id="help">
                <a href=""> <span> Redeem password </span> </a>
            </div>
            <button type="submit" class="form-button"> Sign In </button>
            <a href="/signup" class="other-link"> Don't have account? <span> SignUp </span> </a>
        </form>
    </div>
</section>
<section class="image"></section>