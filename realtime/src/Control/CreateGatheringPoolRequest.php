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

namespace Gs2\Realtime\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class CreateGatheringPoolRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateGatheringPool";

	/** @var string ギャザリングプールの名前 */
	private $name;

	/** @var string ギャザリングプールの説明 */
	private $description;


	/**
	 * ギャザリングプールの名前を取得
	 *
	 * @return string ギャザリングプールの名前
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * ギャザリングプールの名前を設定
	 *
	 * @param string $name ギャザリングプールの名前
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * ギャザリングプールの名前を設定
	 *
	 * @param string $name ギャザリングプールの名前
	 * @return CreateGatheringPoolRequest
	 */
	public function withName($name): CreateGatheringPoolRequest {
		$this->setName($name);
		return $this;
	}

	/**
	 * ギャザリングプールの説明を取得
	 *
	 * @return string ギャザリングプールの説明
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * ギャザリングプールの説明を設定
	 *
	 * @param string $description ギャザリングプールの説明
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * ギャザリングプールの説明を設定
	 *
	 * @param string $description ギャザリングプールの説明
	 * @return CreateGatheringPoolRequest
	 */
	public function withDescription($description): CreateGatheringPoolRequest {
		$this->setDescription($description);
		return $this;
	}

}