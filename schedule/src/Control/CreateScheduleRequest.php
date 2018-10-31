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

namespace Gs2\Schedule\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class CreateScheduleRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateSchedule";

	/** @var string スケジュール名 */
	private $name;

	/** @var string 説明文 */
	private $description;


	/**
	 * スケジュール名を取得
	 *
	 * @return string スケジュール名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * スケジュール名を設定
	 *
	 * @param string $name スケジュール名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * スケジュール名を設定
	 *
	 * @param string $name スケジュール名
	 * @return CreateScheduleRequest
	 */
	public function withName($name): CreateScheduleRequest {
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
	 * @return CreateScheduleRequest
	 */
	public function withDescription($description): CreateScheduleRequest {
		$this->setDescription($description);
		return $this;
	}

}