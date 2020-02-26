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
 * アウトプットを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetOutputRequest extends Gs2BasicRequest {

    /** @var string スタック名 */
    private $stackName;

    /**
     * スタック名を取得
     *
     * @return string|null アウトプットを取得
     */
    public function getStackName(): ?string {
        return $this->stackName;
    }

    /**
     * スタック名を設定
     *
     * @param string $stackName アウトプットを取得
     */
    public function setStackName(string $stackName) {
        $this->stackName = $stackName;
    }

    /**
     * スタック名を設定
     *
     * @param string $stackName アウトプットを取得
     * @return GetOutputRequest $this
     */
    public function withStackName(string $stackName): GetOutputRequest {
        $this->setStackName($stackName);
        return $this;
    }

    /** @var string アウトプット名 */
    private $outputName;

    /**
     * アウトプット名を取得
     *
     * @return string|null アウトプットを取得
     */
    public function getOutputName(): ?string {
        return $this->outputName;
    }

    /**
     * アウトプット名を設定
     *
     * @param string $outputName アウトプットを取得
     */
    public function setOutputName(string $outputName) {
        $this->outputName = $outputName;
    }

    /**
     * アウトプット名を設定
     *
     * @param string $outputName アウトプットを取得
     * @return GetOutputRequest $this
     */
    public function withOutputName(string $outputName): GetOutputRequest {
        $this->setOutputName($outputName);
        return $this;
    }

}