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
class GetEstimateRankResult {

	/** @var long 推定最小順位 */
	private $min;

	/** @var long 推定最大順位 */
	private $max;

    public function __construct(array $array)
    {
        if(isset($array['min'])) {
            $this->min = $array['min'];
        }
        if(isset($array['max'])) {
            $this->max = $array['max'];
        }
    }

	/**
	 * 推定最小順位を取得
	 *
	 * @return long 推定最小順位
	 */
	public function getMin() {
		return $this->min;
	}

	/**
	 * 推定最小順位を設定
	 *
	 * @param long $min 推定最小順位
	 */
	public function setMin($min) {
		$this->min = $min;
	}

	/**
	 * 推定最大順位を取得
	 *
	 * @return long 推定最大順位
	 */
	public function getMax() {
		return $this->max;
	}

	/**
	 * 推定最大順位を設定
	 *
	 * @param long $max 推定最大順位
	 */
	public function setMax($max) {
		$this->max = $max;
	}
}