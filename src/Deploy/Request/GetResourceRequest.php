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

namespace Gs2\Deploy\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * 作成されたのリソースを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetResourceRequest extends Gs2BasicRequest {

    /** @var string スタック名 */
    private $stackName;

    /**
     * スタック名を取得
     *
     * @return string|null 作成されたのリソースを取得
     */
    public function getStackName(): ?string {
        return $this->stackName;
    }

    /**
     * スタック名を設定
     *
     * @param string $stackName 作成されたのリソースを取得
     */
    public function setStackName(string $stackName = null) {
        $this->stackName = $stackName;
    }

    /**
     * スタック名を設定
     *
     * @param string $stackName 作成されたのリソースを取得
     * @return GetResourceRequest $this
     */
    public function withStackName(string $stackName = null): GetResourceRequest {
        $this->setStackName($stackName);
        return $this;
    }

    /** @var string 作成中のリソース名 */
    private $resourceName;

    /**
     * 作成中のリソース名を取得
     *
     * @return string|null 作成されたのリソースを取得
     */
    public function getResourceName(): ?string {
        return $this->resourceName;
    }

    /**
     * 作成中のリソース名を設定
     *
     * @param string $resourceName 作成されたのリソースを取得
     */
    public function setResourceName(string $resourceName = null) {
        $this->resourceName = $resourceName;
    }

    /**
     * 作成中のリソース名を設定
     *
     * @param string $resourceName 作成されたのリソースを取得
     * @return GetResourceRequest $this
     */
    public function withResourceName(string $resourceName = null): GetResourceRequest {
        $this->setResourceName($resourceName);
        return $this;
    }

}