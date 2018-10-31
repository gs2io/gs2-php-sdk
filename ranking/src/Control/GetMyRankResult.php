<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Ranking\Control;

/**
 * @author Game Server Services, Inc.
 */
class GetMyRankResult {

	/** @var long 先頭からの位置 */
	private $index;

	/** @var long 同点同順位を採用した場合の順位 */
	private $rank;

    public function __construct(array $array)
    {
        if(isset($array['index'])) {
            $this->index = $array['index'];
        }
        if(isset($array['rank'])) {
            $this->rank = $array['rank'];
        }
    }

	/**
	 * 先頭からの位置を取得
	 *
	 * @return long 先頭からの位置
	 */
	public function getIndex() {
		return $this->index;
	}

	/**
	 * 先頭からの位置を設定
	 *
	 * @param long $index 先頭からの位置
	 */
	public function setIndex($index) {
		$this->index = $index;
	}

	/**
	 * 同点同順位を採用した場合の順位を取得
	 *
	 * @return long 同点同順位を採用した場合の順位
	 */
	public function getRank() {
		return $this->rank;
	}

	/**
	 * 同点同順位を採用した場合の順位を設定
	 *
	 * @param long $rank 同点同順位を採用した場合の順位
	 */
	public function setRank($rank) {
		$this->rank = $rank;
	}
}