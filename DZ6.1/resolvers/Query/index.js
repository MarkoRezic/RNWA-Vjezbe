const { GraphQLObjectType } = require('graphql');

const fieldsUser = require('./user');
const fieldsUsers = require('./users');
const fieldsPosts = require('./posts');
const fieldsRegions = require('./regions');
const fieldsRegion = require('./region');

const Query = new GraphQLObjectType({
  name: 'Query',
  fields: {
    // Query one user
    user: fieldsUser,
    // Query all users
    users: fieldsUsers,
    // Query all posts
    posts: fieldsPosts,
    // all regions
    regions: fieldsRegions,
    // one region
    region: fieldsRegion
  }
});

module.exports = Query;