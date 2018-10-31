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

namespace Gs2\Gold\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class GetCurrentGoldMasterRequest extends Gs2BasicRequest {

    const FUNCTION = "GetCurrentGoldMaster";

	/** @var string ゴールドプールの名前 */
	private $goldPoolName;


	/**
	 * ゴールドプールの名前を取得
	 *
	 * @return string ゴールドプールの名前
	 */
	public function getGoldPoolName() {
		return $this->goldPoolName;
	}

	/**
	 * ゴールドプールの名前を設定
	 *
	 * @param string $goldPoolName ゴールドプールの名前
	 */
	public function setGoldPoolName($goldPoolName) {
		$this->goldPoolName = $goldPoolName;
	}

	/**
	 * ゴールドプールの名前を設定
	 *
	 * @param string $goldPoolName ゴールドプールの名前
	 * @return GetCurrentGoldMasterRequest
	 */
	public function withGoldPoolName($goldPoolName): GetCurrentGoldMasterRequest {
		$this->setGoldPoolName($goldPoolName);
		return $this;
	}

}