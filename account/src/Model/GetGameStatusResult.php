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

namespace Gs2\Account\Model;

/**
 * @author Game Server Services, Inc.
 */
class GetGameStatusResult {

	/** @var string ステータス */
	private $status;


    public function __construct(array $array)
    {

        $this->status = $array['status'];

    }


	/**
	 * ステータスを取得
	 *
	 * @return string ステータス
	 */
	public function getStatus(): string {
		return $this->status;
	}

	/**
	 * ステータスを設定
	 *
	 * @param string $status ステータス
	 */
	public function setStatus(string $status) {
		$this->status = $status;
	}

}