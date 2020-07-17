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
 * クエストモデルマスターを削除 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteQuestModelMasterRequest extends Gs2BasicRequest {

    /** @var string カテゴリ名 */
    private $namespaceName;

    /**
     * カテゴリ名を取得
     *
     * @return string|null クエストモデルマスターを削除
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $namespaceName クエストモデルマスターを削除
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $namespaceName クエストモデルマスターを削除
     * @return DeleteQuestModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): DeleteQuestModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string クエストグループモデル名 */
    private $questGroupName;

    /**
     * クエストグループモデル名を取得
     *
     * @return string|null クエストモデルマスターを削除
     */
    public function getQuestGroupName(): ?string {
        return $this->questGroupName;
    }

    /**
     * クエストグループモデル名を設定
     *
     * @param string $questGroupName クエストモデルマスターを削除
     */
    public function setQuestGroupName(string $questGroupName = null) {
        $this->questGroupName = $questGroupName;
    }

    /**
     * クエストグループモデル名を設定
     *
     * @param string $questGroupName クエストモデルマスターを削除
     * @return DeleteQuestModelMasterRequest $this
     */
    public function withQuestGroupName(string $questGroupName = null): DeleteQuestModelMasterRequest {
        $this->setQuestGroupName($questGroupName);
        return $this;
    }

    /** @var string クエスト名 */
    private $questName;

    /**
     * クエスト名を取得
     *
     * @return string|null クエストモデルマスターを削除
     */
    public function getQuestName(): ?string {
        return $this->questName;
    }

    /**
     * クエスト名を設定
     *
     * @param string $questName クエストモデルマスターを削除
     */
    public function setQuestName(string $questName = null) {
        $this->questName = $questName;
    }

    /**
     * クエスト名を設定
     *
     * @param string $questName クエストモデルマスターを削除
     * @return DeleteQuestModelMasterRequest $this
     */
    public function withQuestName(string $questName = null): DeleteQuestModelMasterRequest {
        $this->setQuestName($questName);
        return $this;
    }

}