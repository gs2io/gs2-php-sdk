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

namespace Gs2\Gacha\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class GetGachaRequest extends Gs2BasicRequest {

    const FUNCTION = "GetGacha";

	/** @var string ガチャプールの名前を指定します。 */
	private $gachaPoolName;

	/** @var string ガチャの名前を指定します。 */
	private $gachaName;


	/**
	 * ガチャプールの名前を指定します。を取得
	 *
	 * @return string ガチャプールの名前を指定します。
	 */
	public function getGachaPoolName() {
		return $this->gachaPoolName;
	}

	/**
	 * ガチャプールの名前を指定します。を設定
	 *
	 * @param string $gachaPoolName ガチャプールの名前を指定します。
	 */
	public function setGachaPoolName($gachaPoolName) {
		$this->gachaPoolName = $gachaPoolName;
	}

	/**
	 * ガチャプールの名前を指定します。を設定
	 *
	 * @param string $gachaPoolName ガチャプールの名前を指定します。
	 * @return GetGachaRequest
	 */
	public function withGachaPoolName($gachaPoolName): GetGachaRequest {
		$this->setGachaPoolName($gachaPoolName);
		return $this;
	}

	/**
	 * ガチャの名前を指定します。を取得
	 *
	 * @return string ガチャの名前を指定します。
	 */
	public function getGachaName() {
		return $this->gachaName;
	}

	/**
	 * ガチャの名前を指定します。を設定
	 *
	 * @param string $gachaName ガチャの名前を指定します。
	 */
	public function setGachaName($gachaName) {
		$this->gachaName = $gachaName;
	}

	/**
	 * ガチャの名前を指定します。を設定
	 *
	 * @param string $gachaName ガチャの名前を指定します。
	 * @return GetGachaRequest
	 */
	public function withGachaName($gachaName): GetGachaRequest {
		$this->setGachaName($gachaName);
		return $this;
	}

}