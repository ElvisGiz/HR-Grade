document.addEventListener('DOMContentLoaded', () => {
  const grageDirections = document.querySelectorAll('.grade-section__title');

  //выпадашка->
  grageDirections.forEach(item => {
    item.addEventListener('click', () => item.closest('.grade-section').classList.toggle('is-open'))
  })
})

//Слайдер
var swiper = new Swiper(".mySwiper", {
  slidesPerView: 3,
  spaceBetween: 30,
  grabCursor: true,
});

const favorite = {
  controlFavorite(id) {
    let favorite = this.getFavorite(),
      check = this.checkFavorite(favorite, id),
      update;

    this.switchClassFavorite(id);

    update = (check === true) ? this.removeFavorite(favorite, id) : this.addFavorite(favorite, id);
    this.setFavorite(update);
  },

  getFavorite() {
    return localStorage.getItem('favorite') ? localStorage.getItem('favorite').split(',') : []
  },

  setFavorite(array) {
    localStorage.setItem('favorite', array)
  },

  checkFavorite(array, id) {
    return array.includes(id);
  },

  addFavorite(array, id) {
    return array.concat(id);
  },

  removeFavorite(array, id) {
    return array.filter(item => item !== id);
  },

  switchClassFavorite(id) {
    let favoriteItem = document.querySelectorAll(`[data-technology="${ id }"]`);

    for (let item of favoriteItem) {
      item.classList.toggle('grade__item--active');
    }
  },

  setActiveElementsFavorite(favorites) {
    if (!favorites) return;

    for (let id of favorites) {
      let favorite = document.querySelectorAll(`[data-technology="${ id }"]`);

      for (let item of favorite) {
        item.classList.add('grade__item--active');
      }
    }
  }
}

document.addEventListener('DOMContentLoaded', () => {
  favorite.setActiveElementsFavorite(favorite.getFavorite());

  document.addEventListener('click', ({ target }) => {
    if (target.classList.contains('js-add-favorite'))
      favorite.controlFavorite(target.dataset.favorite);
  })
})



//модалка через аякс
$(function(){

  $(".grade__item").on("click",function () {

    let id = $(this).data('technology');

    $.ajax({
      url: '/ajax/modal.php',
      type: 'POST',
      data: {
        'id': id
      },
      success: function(data) { //когда данные переданы в обработчик, открыть модалку
        $('#modalTitleGrade').html(data);

        favorite.setActiveElementsFavorite(favorite.getFavorite());
        $('.modal').addClass('show');
        $('.modal').show();

      },
      complete: function (data) { //когда модалку надо закрыть, очистить данные
        $("#modal_btn").on("click", function () {
          $('.grade-popup').hide();

        })


      }
    })

  })

});



