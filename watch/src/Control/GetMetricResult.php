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

namespace Gs2\Watch\Control;
use Gs2\Watch\Model\Metric;

/**
 * @author Game Server Services, Inc.
 */
class GetMetricResult {

	/** @var Metric[] メトリック */
	private $items;

    public function __construct(array $array)
    {
        if(isset($array['items'])) {
            $this->items = [];
            foreach($array['items'] as $arr)
            {
                array_push($this->items, Metric::build($arr));
            }
        }
    }

	/**
	 * メトリックを取得
	 *
	 * @return Metric[] メトリック
	 */
	public function getItems() {
		return $this->items;
	}

	/**
	 * メトリックを設定
	 *
	 * @param Metric[] $items メトリック
	 */
	public function setItems($items) {
		$this->items = $items;
	}
}