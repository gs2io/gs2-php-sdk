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

namespace Gs2\Ranking\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * カテゴリマスターを削除 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteCategoryModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null カテゴリマスターを削除
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName カテゴリマスターを削除
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName カテゴリマスターを削除
     * @return DeleteCategoryModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): DeleteCategoryModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string カテゴリモデル名 */
    private $categoryName;

    /**
     * カテゴリモデル名を取得
     *
     * @return string|null カテゴリマスターを削除
     */
    public function getCategoryName(): ?string {
        return $this->categoryName;
    }

    /**
     * カテゴリモデル名を設定
     *
     * @param string $categoryName カテゴリマスターを削除
     */
    public function setCategoryName(string $categoryName = null) {
        $this->categoryName = $categoryName;
    }

    /**
     * カテゴリモデル名を設定
     *
     * @param string $categoryName カテゴリマスターを削除
     * @return DeleteCategoryModelMasterRequest $this
     */
    public function withCategoryName(string $categoryName = null): DeleteCategoryModelMasterRequest {
        $this->setCategoryName($categoryName);
        return $this;
    }

}