import axios from 'axios'

export default () => {
  return axios.create({
    baseURL: 'https://couchplanner.dwayneh.nl/api/v1/'
  })
}
