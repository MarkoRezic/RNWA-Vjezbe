const { GraphQLInt } = require('graphql');
const { dbQuery } = require('../../database');
const RegionType = require('../../types/Region');

const fieldsRegion = {
    type: RegionType,
    args: {
        region_id: { type: GraphQLInt }
    },
    async resolve(_, { region_id }) {
        let res = await dbQuery(`SELECT * FROM regions WHERE region_id = ${region_id}`);
        return res[0];
    }
};

module.exports = fieldsRegion;
