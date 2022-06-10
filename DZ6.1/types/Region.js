const { GraphQLObjectType, GraphQLInt, GraphQLString, GraphQLList } = require('graphql');

const RegionType = new GraphQLObjectType({
    name: 'Region',
    fields: () => (
        {
            region_id: { type: GraphQLInt },
            region_name: { type: GraphQLString },
        }
    )
});

module.exports = RegionType;