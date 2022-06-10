const { GraphQLString } = require('graphql');
const { dbQuery } = require('../../database');
const RegionType = require('../../types/Region');

const insertRegion = {
    type: RegionType,
    args: {
        region_id: { type: GraphQLString },
        region_name: { type: GraphQLString }
    },
    async resolve(_, { region_id, region_name }) {
        let res = await dbQuery(`insert into regions (region_id, region_name) values ('${region_id}', '${region_name}')`);
        return { region_id, region_name }
    }
};

module.exports = insertRegion;