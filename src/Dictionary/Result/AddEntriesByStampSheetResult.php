<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\Dictionary\Result;

use Gs2\Core\Model\IResult;
use Gs2\Dictionary\Model\Entry;

/**
 * スタンプシートでエントリーを追加 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class AddEntriesByStampSheetResult implements IResult {
	/** @var Entry[] 追加後のエントリーのリスト */
	private $items;

	/**
	 * 追加後のエントリーのリストを取得
	 *
	 * @return Entry[]|null スタンプシートでエントリーを追加
	 */
	public function getItems(): ?array {
		return $this->items;
	}

	/**
	 * 追加後のエントリーのリストを設定
	 *
	 * @param Entry[]|null $items スタンプシートでエントリーを追加
	 */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    public static function fromJson(array $data): AddEntriesByStampSheetResult {
        $result = new AddEntriesByStampSheetResult();
        $result->setItems(array_map(
                function ($v) {
                    return Entry::fromJson($v);
                },
                isset($data["items"]) ? $data["items"] : []
            )
        );
        return $result;
    }
}