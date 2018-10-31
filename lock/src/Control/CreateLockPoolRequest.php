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

namespace Gs2\Lock\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class CreateLockPoolRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateLockPool";

	/** @var string ロックプールの名前 */
	private $name;

	/** @var string 説明文 */
	private $description;

	/** @var string サービスクラス */
	private $serviceClass;


	/**
	 * ロックプールの名前を取得
	 *
	 * @return string ロックプールの名前
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * ロックプールの名前を設定
	 *
	 * @param string $name ロックプールの名前
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * ロックプールの名前を設定
	 *
	 * @param string $name ロックプールの名前
	 * @return CreateLockPoolRequest
	 */
	public function withName($name): CreateLockPoolRequest {
		$this->setName($name);
		return $this;
	}

	/**
	 * 説明文を取得
	 *
	 * @return string 説明文
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string $description 説明文
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string $description 説明文
	 * @return CreateLockPoolRequest
	 */
	public function withDescription($description): CreateLockPoolRequest {
		$this->setDescription($description);
		return $this;
	}

	/**
	 * サービスクラスを取得
	 *
	 * @return string サービスクラス
	 */
	public function getServiceClass() {
		return $this->serviceClass;
	}

	/**
	 * サービスクラスを設定
	 *
	 * @param string $serviceClass サービスクラス
	 */
	public function setServiceClass($serviceClass) {
		$this->serviceClass = $serviceClass;
	}

	/**
	 * サービスクラスを設定
	 *
	 * @param string $serviceClass サービスクラス
	 * @return CreateLockPoolRequest
	 */
	public function withServiceClass($serviceClass): CreateLockPoolRequest {
		$this->setServiceClass($serviceClass);
		return $this;
	}

}