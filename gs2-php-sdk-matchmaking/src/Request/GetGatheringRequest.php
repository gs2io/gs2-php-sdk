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

namespace Gs2\Matchmaking\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * ギャザリングを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetGatheringRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ギャザリングを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ギャザリングを取得
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ギャザリングを取得
     * @return GetGatheringRequest $this
     */
    public function withNamespaceName(string $namespaceName): GetGatheringRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ギャザリング名 */
    private $gatheringName;

    /**
     * ギャザリング名を取得
     *
     * @return string|null ギャザリングを取得
     */
    public function getGatheringName(): ?string {
        return $this->gatheringName;
    }

    /**
     * ギャザリング名を設定
     *
     * @param string $gatheringName ギャザリングを取得
     */
    public function setGatheringName(string $gatheringName) {
        $this->gatheringName = $gatheringName;
    }

    /**
     * ギャザリング名を設定
     *
     * @param string $gatheringName ギャザリングを取得
     * @return GetGatheringRequest $this
     */
    public function withGatheringName(string $gatheringName): GetGatheringRequest {
        $this->setGatheringName($gatheringName);
        return $this;
    }

}