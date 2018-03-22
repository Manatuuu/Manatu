request = require 'request'

module.exports = (app) ->

  return unless /^https?:\/\/.+/.test process.env.HEROKU_URL

  setInterval ->
    console.log 'ping'
    url = "#{process.env.HEROKU_URL}?time=#{Date.now()}"
    request.head url, (err, res) ->
      if !err and res.statusCode is 200
        console.log 'pong'
  , 60 * 1000 * 20  # 20 min
