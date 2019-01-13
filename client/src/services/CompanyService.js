import Api from '@/services/Api'

export default {
  producers () {
    return Api().get('producers')
  },
  licensors () {
    return Api().get('licensors')
  },
  studios () {
    return Api().get('studios')
  }
}
