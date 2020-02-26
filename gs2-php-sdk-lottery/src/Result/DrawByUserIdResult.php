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

namespace Gs2\Lottery\Result;

use Gs2\Core\Model\IResult;
use Gs2\Lottery\Model\BoxItems;
use Gs2\Lottery\Model\DrawnPrize;

/**
 * ユーザIDを指定して抽選を実行 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DrawByUserIdResult implements IResult {
	/** @var DrawnPrize[] 抽選結果の景品リスト */
	private $items;
	/** @var string 排出された景品を入手するスタンプシート */
	private $stampSheet;
	/** @var BoxItems ボックスから取り出したアイテムのリスト */
	private $boxItems;

	/**
	 * 抽選結果の景品リストを取得
	 *
	 * @return DrawnPrize[]|null ユーザIDを指定して抽選を実行
	 */
	public function getItems(): ?array {
		return $this->items;
	}

	/**
	 * 抽選結果の景品リストを設定
	 *
	 * @param DrawnPrize[]|null $items ユーザIDを指定して抽選を実行
	 */
	public function setItems(?array $items) {
		$this->items = $items;
	}

	/**
	 * 排出された景品を入手するスタンプシートを取得
	 *
	 * @return string|null ユーザIDを指定して抽選を実行
	 */
	public function getStampSheet(): ?string {
		return $this->stampSheet;
	}

	/**
	 * 排出された景品を入手するスタンプシートを設定
	 *
	 * @param string|null $stampSheet ユーザIDを指定して抽選を実行
	 */
	public function setStampSheet(?string $stampSheet) {
		$this->stampSheet = $stampSheet;
	}

	/**
	 * ボックスから取り出したアイテムのリストを取得
	 *
	 * @return BoxItems|null ユーザIDを指定して抽選を実行
	 */
	public function getBoxItems(): ?BoxItems {
		return $this->boxItems;
	}

	/**
	 * ボックスから取り出したアイテムのリストを設定
	 *
	 * @param BoxItems|null $boxItems ユーザIDを指定して抽選を実行
	 */
	public function setBoxItems(?BoxItems $boxItems) {
		$this->boxItems = $boxItems;
	}

    public static function fromJson(array $data): DrawByUserIdResult {
        $result = new DrawByUserIdResult();
        $result->setItems(array_map(
                function ($v) {
                    return DrawnPrize::fromJson($v);
                },
                isset($data["items"]) ? $data["items"] : []
            )
        );
        $result->setStampSheet(isset($data["stampSheet"]) ? $data["stampSheet"] : null);
        $result->setBoxItems(isset($data["boxItems"]) ? BoxItems::fromJson($data["boxItems"]) : null);
        return $result;
    }
}