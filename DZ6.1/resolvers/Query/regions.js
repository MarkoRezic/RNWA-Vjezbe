const { GraphQLList } = require('graphql');
const { dbQuery } = require('../../database');
const RegionType = require('../../types/Region');

const fieldsRegions = {
    type: new GraphQLList(RegionType),
    async resolve(_, { }) {
        let res = await dbQuery(`SELECT * FROM regions`);
        return res;
    }
};

module.exports = fieldsRegions;
