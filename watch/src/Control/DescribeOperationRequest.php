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

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class DescribeOperationRequest extends Gs2BasicRequest {

    const FUNCTION = "DescribeOperation";

	/** @var string サービス名。 */
	private $service;


	/**
	 * サービス名。を取得
	 *
	 * @return string サービス名。
	 */
	public function getService() {
		return $this->service;
	}

	/**
	 * サービス名。を設定
	 *
	 * @param string $service サービス名。
	 */
	public function setService($service) {
		$this->service = $service;
	}

	/**
	 * サービス名。を設定
	 *
	 * @param string $service サービス名。
	 * @return DescribeOperationRequest
	 */
	public function withService($service): DescribeOperationRequest {
		$this->setService($service);
		return $this;
	}

}