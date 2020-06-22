<script>

    import ScreeningMovie from "./ScreeningMovie";

    export default {
        components : {
            ScreeningMovie
        },
        data(){
            return{
                weekDays : [],
                movieList : {},
            }
        },
        created: async function(){
            const aDate = new Date(),
                aDayNum = 7;
            for ( let aIndex = 1; aIndex <= aDayNum; aIndex++ )
            {
                let addDate = ( aIndex === 1 ) ? 0  : 1;
                aDate.setDate( aDate.getDate() + addDate );
                let aMonth = ( '0' + ( aDate.getMonth() + 1 ) ).slice( -2 );
                let aDay = ( '0' + aDate.getDate() ).slice( -2 );
                let aYear = aDate.getFullYear();
                let aYearMonthDay = `${aYear}${aMonth}${aDay}`;
                this.weekDays.push( aYearMonthDay );
                this.$set(this.movieList, aYearMonthDay, []);
            }
            const response = await this.$axios.get('/api/screening_movie');
            for ( let aScreeningDay of this.weekDays )
            {
                for( let aMovie of response.data )
                {
                    if ( aMovie.start_date <= aScreeningDay && aMovie.end_date >= aScreeningDay )
                    {
                        this.movieList[aScreeningDay].push(aMovie);
                    }
                }
            }
        },
        render : function ( h ) {
            return h( ScreeningMovie, {
                props:{
                    week: this.weekDays,
                    movieList: this.movieList,
                },
            })
        }
    }
</script>
