//import Form from '../components/form';

export default {
  init() {
    
    //this.form = new Form('.contact-form__element','[data-label="floating"]');

    document.addEventListener( 'wpcf7mailsent', function( ) {
      let thankyouURL = document.querySelector('.wpcf7-form .thank-you-URL').value;
      console.log(thankyouURL);
      if (thankyouURL!==null) {
        window.location.href = thankyouURL;
      }
    }, false );
  },
};
