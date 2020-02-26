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

namespace Gs2\Formation\Result;

use Gs2\Core\Model\IResult;
use Gs2\Formation\Model\Form;
use Gs2\Formation\Model\Mold;

/**
 * 署名付きスロットを使ってフォームを更新 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class AcquireActionsToFormPropertiesResult implements IResult {
	/** @var Form フォーム */
	private $item;
	/** @var Mold 保存したフォーム */
	private $mold;
	/** @var string スタンプシート */
	private $stampSheet;

	/**
	 * フォームを取得
	 *
	 * @return Form|null 署名付きスロットを使ってフォームを更新
	 */
	public function getItem(): ?Form {
		return $this->item;
	}

	/**
	 * フォームを設定
	 *
	 * @param Form|null $item 署名付きスロットを使ってフォームを更新
	 */
	public function setItem(?Form $item) {
		$this->item = $item;
	}

	/**
	 * 保存したフォームを取得
	 *
	 * @return Mold|null 署名付きスロットを使ってフォームを更新
	 */
	public function getMold(): ?Mold {
		return $this->mold;
	}

	/**
	 * 保存したフォームを設定
	 *
	 * @param Mold|null $mold 署名付きスロットを使ってフォームを更新
	 */
	public function setMold(?Mold $mold) {
		$this->mold = $mold;
	}

	/**
	 * スタンプシートを取得
	 *
	 * @return string|null 署名付きスロットを使ってフォームを更新
	 */
	public function getStampSheet(): ?string {
		return $this->stampSheet;
	}

	/**
	 * スタンプシートを設定
	 *
	 * @param string|null $stampSheet 署名付きスロットを使ってフォームを更新
	 */
	public function setStampSheet(?string $stampSheet) {
		$this->stampSheet = $stampSheet;
	}

    public static function fromJson(array $data): AcquireActionsToFormPropertiesResult {
        $result = new AcquireActionsToFormPropertiesResult();
        $result->setItem(isset($data["item"]) ? Form::fromJson($data["item"]) : null);
        $result->setMold(isset($data["mold"]) ? Mold::fromJson($data["mold"]) : null);
        $result->setStampSheet(isset($data["stampSheet"]) ? $data["stampSheet"] : null);
        return $result;
    }
}