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

namespace Gs2\Version\Result;

use Gs2\Core\Model\IResult;
use Gs2\Version\Model\VersionModel;

/**
 * バージョン設定の一覧を取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeVersionModelsResult implements IResult {
	/** @var VersionModel[] バージョン設定のリスト */
	private $items;

	/**
	 * バージョン設定のリストを取得
	 *
	 * @return VersionModel[]|null バージョン設定の一覧を取得
	 */
	public function getItems(): ?array {
		return $this->items;
	}

	/**
	 * バージョン設定のリストを設定
	 *
	 * @param VersionModel[]|null $items バージョン設定の一覧を取得
	 */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    public static function fromJson(array $data): DescribeVersionModelsResult {
        $result = new DescribeVersionModelsResult();
        $result->setItems(array_map(
                function ($v) {
                    return VersionModel::fromJson($v);
                },
                isset($data["items"]) ? $data["items"] : []
            )
        );
        return $result;
    }
}