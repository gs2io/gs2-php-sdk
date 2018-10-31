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

namespace Gs2\Key\Control;

/**
 * @author Game Server Services, Inc.
 */
class EncryptResult {

	/** @var string 暗号化済みデータ */
	private $data;

    public function __construct(array $array)
    {
        if(isset($array['data'])) {
            $this->data = $array['data'];
        }
    }

	/**
	 * 暗号化済みデータを取得
	 *
	 * @return string 暗号化済みデータ
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * 暗号化済みデータを設定
	 *
	 * @param string $data 暗号化済みデータ
	 */
	public function setData($data) {
		$this->data = $data;
	}
}