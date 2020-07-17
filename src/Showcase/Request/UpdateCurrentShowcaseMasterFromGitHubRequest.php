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

namespace Gs2\Showcase\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Showcase\Model\GitHubCheckoutSetting;

/**
 * 現在有効な陳列棚マスターを更新します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateCurrentShowcaseMasterFromGitHubRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 現在有効な陳列棚マスターを更新します
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 現在有効な陳列棚マスターを更新します
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 現在有効な陳列棚マスターを更新します
     * @return UpdateCurrentShowcaseMasterFromGitHubRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): UpdateCurrentShowcaseMasterFromGitHubRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var GitHubCheckoutSetting GitHubからマスターデータをチェックアウトしてくる設定 */
    private $checkoutSetting;

    /**
     * GitHubからマスターデータをチェックアウトしてくる設定を取得
     *
     * @return GitHubCheckoutSetting|null 現在有効な陳列棚マスターを更新します
     */
    public function getCheckoutSetting(): ?GitHubCheckoutSetting {
        return $this->checkoutSetting;
    }

    /**
     * GitHubからマスターデータをチェックアウトしてくる設定を設定
     *
     * @param GitHubCheckoutSetting $checkoutSetting 現在有効な陳列棚マスターを更新します
     */
    public function setCheckoutSetting(GitHubCheckoutSetting $checkoutSetting = null) {
        $this->checkoutSetting = $checkoutSetting;
    }

    /**
     * GitHubからマスターデータをチェックアウトしてくる設定を設定
     *
     * @param GitHubCheckoutSetting $checkoutSetting 現在有効な陳列棚マスターを更新します
     * @return UpdateCurrentShowcaseMasterFromGitHubRequest $this
     */
    public function withCheckoutSetting(GitHubCheckoutSetting $checkoutSetting = null): UpdateCurrentShowcaseMasterFromGitHubRequest {
        $this->setCheckoutSetting($checkoutSetting);
        return $this;
    }

}