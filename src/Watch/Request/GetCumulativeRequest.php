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

namespace Gs2\Watch\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * 累積値を取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetCumulativeRequest extends Gs2BasicRequest {

    /** @var string 名前 */
    private $name;

    /**
     * 名前を取得
     *
     * @return string|null 累積値を取得
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * 名前を設定
     *
     * @param string $name 累積値を取得
     */
    public function setName(string $name = null) {
        $this->name = $name;
    }

    /**
     * 名前を設定
     *
     * @param string $name 累積値を取得
     * @return GetCumulativeRequest $this
     */
    public function withName(string $name = null): GetCumulativeRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string リソースのGRN */
    private $resourceGrn;

    /**
     * リソースのGRNを取得
     *
     * @return string|null 累積値を取得
     */
    public function getResourceGrn(): ?string {
        return $this->resourceGrn;
    }

    /**
     * リソースのGRNを設定
     *
     * @param string $resourceGrn 累積値を取得
     */
    public function setResourceGrn(string $resourceGrn = null) {
        $this->resourceGrn = $resourceGrn;
    }

    /**
     * リソースのGRNを設定
     *
     * @param string $resourceGrn 累積値を取得
     * @return GetCumulativeRequest $this
     */
    public function withResourceGrn(string $resourceGrn = null): GetCumulativeRequest {
        $this->setResourceGrn($resourceGrn);
        return $this;
    }

}