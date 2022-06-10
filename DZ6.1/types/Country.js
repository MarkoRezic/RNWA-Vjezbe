const { GraphQLObjectType, GraphQLInt, GraphQLString } = require('graphql');
const { dbQuery } = require('../database');
const Region = require('./Region.js');

const CountryType = new GraphQLObjectType({
    name: 'Country',
    fields: () => (
        {
            country_id: { type: GraphQLString },
            country_name: { type: GraphQLInt },
            region: {
                type: Region,
                resolve: async (region) => {
                    let res = await dbQuery(`SELECT * FROM regions WHERE region_id = ${parseInt(region.region_id)}`);
                    return res[0];
                }
            }
        }
    )
});

module.exports = CountryType;