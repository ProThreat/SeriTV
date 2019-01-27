import Api from '@/services/Api'

export default {
  index () {
    return Api().get('movies')
  },
  search (q) {
    return Api().get('movies/search/' + q)
  }
}
