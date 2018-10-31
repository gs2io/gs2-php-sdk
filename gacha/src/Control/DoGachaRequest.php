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

use Gs2\Core\Control\Gs2UserRequest;

/**
 * @author Game Server Services, Inc.
 */
class DoGachaRequest extends Gs2UserRequest {

    const FUNCTION = "DoGacha";

	/** @var string ガチャプールの名前を指定します。 */
	private $gachaPoolName;

	/** @var string ガチャの名前を指定します。 */
	private $gachaName;

	/** @var string コンテキストデータ */
	private $context;


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
	 * @return DoGachaRequest
	 */
	public function withGachaPoolName($gachaPoolName): DoGachaRequest {
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
	 * @return DoGachaRequest
	 */
	public function withGachaName($gachaName): DoGachaRequest {
		$this->setGachaName($gachaName);
		return $this;
	}

	/**
	 * コンテキストデータを取得
	 *
	 * @return string コンテキストデータ
	 */
	public function getContext() {
		return $this->context;
	}

	/**
	 * コンテキストデータを設定
	 *
	 * @param string $context コンテキストデータ
	 */
	public function setContext($context) {
		$this->context = $context;
	}

	/**
	 * コンテキストデータを設定
	 *
	 * @param string $context コンテキストデータ
	 * @return DoGachaRequest
	 */
	public function withContext($context): DoGachaRequest {
		$this->setContext($context);
		return $this;
	}

}