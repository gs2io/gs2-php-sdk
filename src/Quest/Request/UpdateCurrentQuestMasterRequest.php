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

namespace Gs2\Quest\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * 現在有効なクエストマスターを更新します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateCurrentQuestMasterRequest extends Gs2BasicRequest {

    /** @var string カテゴリ名 */
    private $namespaceName;

    /**
     * カテゴリ名を取得
     *
     * @return string|null 現在有効なクエストマスターを更新します
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $namespaceName 現在有効なクエストマスターを更新します
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $namespaceName 現在有効なクエストマスターを更新します
     * @return UpdateCurrentQuestMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): UpdateCurrentQuestMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string マスターデータ */
    private $settings;

    /**
     * マスターデータを取得
     *
     * @return string|null 現在有効なクエストマスターを更新します
     */
    public function getSettings(): ?string {
        return $this->settings;
    }

    /**
     * マスターデータを設定
     *
     * @param string $settings 現在有効なクエストマスターを更新します
     */
    public function setSettings(string $settings = null) {
        $this->settings = $settings;
    }

    /**
     * マスターデータを設定
     *
     * @param string $settings 現在有効なクエストマスターを更新します
     * @return UpdateCurrentQuestMasterRequest $this
     */
    public function withSettings(string $settings = null): UpdateCurrentQuestMasterRequest {
        $this->setSettings($settings);
        return $this;
    }

}