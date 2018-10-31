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

namespace Gs2\ConsumableItem\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class ExportMasterRequest extends Gs2BasicRequest {

    const FUNCTION = "ExportMaster";

	/** @var string アイテムプールの名前を指定します。 */
	private $itemPoolName;


	/**
	 * アイテムプールの名前を指定します。を取得
	 *
	 * @return string アイテムプールの名前を指定します。
	 */
	public function getItemPoolName() {
		return $this->itemPoolName;
	}

	/**
	 * アイテムプールの名前を指定します。を設定
	 *
	 * @param string $itemPoolName アイテムプールの名前を指定します。
	 */
	public function setItemPoolName($itemPoolName) {
		$this->itemPoolName = $itemPoolName;
	}

	/**
	 * アイテムプールの名前を指定します。を設定
	 *
	 * @param string $itemPoolName アイテムプールの名前を指定します。
	 * @return ExportMasterRequest
	 */
	public function withItemPoolName($itemPoolName): ExportMasterRequest {
		$this->setItemPoolName($itemPoolName);
		return $this;
	}

}