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

namespace Gs2\JobQueue\Control;
use Gs2\JobQueue\Model\Job;

/**
 * @author Game Server Services, Inc.
 */
class PushResult {

	/** @var Job[] ジョブ */
	private $items;

    public function __construct(array $array)
    {
        if(isset($array['items'])) {
            $this->items = [];
            foreach($array['items'] as $arr)
            {
                array_push($this->items, Job::build($arr));
            }
        }
    }

	/**
	 * ジョブを取得
	 *
	 * @return Job[] ジョブ
	 */
	public function getItems() {
		return $this->items;
	}

	/**
	 * ジョブを設定
	 *
	 * @param Job[] $items ジョブ
	 */
	public function setItems($items) {
		$this->items = $items;
	}
}