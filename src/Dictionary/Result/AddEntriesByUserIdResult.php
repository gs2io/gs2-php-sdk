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
 * ユーザIDを指定してエントリーを入手済みとして登録 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class AddEntriesByUserIdResult implements IResult {
	/** @var Entry[] 登録した{model_name}のリスト */
	private $items;

	/**
	 * 登録した{model_name}のリストを取得
	 *
	 * @return Entry[]|null ユーザIDを指定してエントリーを入手済みとして登録
	 */
	public function getItems(): ?array {
		return $this->items;
	}

	/**
	 * 登録した{model_name}のリストを設定
	 *
	 * @param Entry[]|null $items ユーザIDを指定してエントリーを入手済みとして登録
	 */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    public static function fromJson(array $data): AddEntriesByUserIdResult {
        $result = new AddEntriesByUserIdResult();
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