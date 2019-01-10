import Api from '@/services/Api'

export default {
  index (polls) {
    return Api().get('movie', {params: polls})
  },
  movie (poll) {
    return Api().get('movie/movie/', {params: poll})
  }
}
