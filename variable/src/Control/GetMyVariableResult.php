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

namespace Gs2\Variable\Control;

/**
 * @author Game Server Services, Inc.
 */
class GetMyVariableResult {

	/** @var string 値 */
	private $value;

	/** @var int 有効期限(エポック秒) */
	private $expire;

    public function __construct(array $array)
    {
        if(isset($array['value'])) {
            $this->value = $array['value'];
        }
        if(isset($array['expire'])) {
            $this->expire = $array['expire'];
        }
    }

	/**
	 * 値を取得
	 *
	 * @return string 値
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * 値を設定
	 *
	 * @param string $value 値
	 */
	public function setValue($value) {
		$this->value = $value;
	}

	/**
	 * 有効期限(エポック秒)を取得
	 *
	 * @return int 有効期限(エポック秒)
	 */
	public function getExpire() {
		return $this->expire;
	}

	/**
	 * 有効期限(エポック秒)を設定
	 *
	 * @param int $expire 有効期限(エポック秒)
	 */
	public function setExpire($expire) {
		$this->expire = $expire;
	}
}