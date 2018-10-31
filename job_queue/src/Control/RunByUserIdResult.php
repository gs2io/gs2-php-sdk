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
use Gs2\JobQueue\Model\JobResult;

/**
 * @author Game Server Services, Inc.
 */
class RunByUserIdResult {

	/** @var JobResult ジョブ結果 */
	private $item;

    public function __construct(array $array)
    {
        if(isset($array['item'])) {
            $this->item = JobResult::build($array['item']);
        }
    }

	/**
	 * ジョブ結果を取得
	 *
	 * @return JobResult ジョブ結果
	 */
	public function getItem() {
		return $this->item;
	}

	/**
	 * ジョブ結果を設定
	 *
	 * @param JobResult $item ジョブ結果
	 */
	public function setItem($item) {
		$this->item = $item;
	}
}