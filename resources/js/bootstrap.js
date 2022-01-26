window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

window.formatDate = (date) => Intl.DateTimeFormat('fr', { weekday: 'long', month: 'short', day: 'numeric', hour:'numeric', minute:'numeric', hour12:false }).format(new Date(date)) // Friday, Dec 27
window.birthday = (date) => Intl.DateTimeFormat('fr', { weekday: 'long', month: 'short', day: 'numeric', year: 'numeric' }).format(new Date(date)) // Friday, Dec 27
window.timeAgo = function( prev) {
    let current = new Date()
    let previous = new Date(prev)

      var msPerMinute = 60 * 1000;
      var msPerHour = msPerMinute * 60;
      var msPerDay = msPerHour * 24;
      var msPerMonth = msPerDay * 30;
      var msPerYear = msPerDay * 365;

      var elapsed = current - previous;

      if (elapsed < msPerMinute) {
           return 'Il y a ' + Math.round(elapsed/1000) + ' secondes';
      }

      else if (elapsed < msPerHour) {
           return 'Il y a ' + Math.round(elapsed/msPerMinute) + ' minutes';
      }

      else if (elapsed < msPerDay ) {
           return 'Il y a ' + Math.round(elapsed/msPerHour ) + ' heures';
      }

      else if (elapsed < msPerMonth) {
          return 'Il y a environ ' + Math.round(elapsed/msPerDay) + ' jours';
      }

      else if (elapsed < msPerYear) {
          return 'Il y a environ ' + Math.round(elapsed/msPerMonth) + ' mois';
      }

      else {
          return 'Il y a environ ' + Math.round(elapsed/msPerYear ) + ' années';
      }
    }
