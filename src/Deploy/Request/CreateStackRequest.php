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
 * スタックを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateStackRequest extends Gs2BasicRequest {

    /** @var string スタック名 */
    private $name;

    /**
     * スタック名を取得
     *
     * @return string|null スタックを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * スタック名を設定
     *
     * @param string $name スタックを新規作成
     */
    public function setName(string $name = null) {
        $this->name = $name;
    }

    /**
     * スタック名を設定
     *
     * @param string $name スタックを新規作成
     * @return CreateStackRequest $this
     */
    public function withName(string $name = null): CreateStackRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string スタックの説明 */
    private $description;

    /**
     * スタックの説明を取得
     *
     * @return string|null スタックを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * スタックの説明を設定
     *
     * @param string $description スタックを新規作成
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * スタックの説明を設定
     *
     * @param string $description スタックを新規作成
     * @return CreateStackRequest $this
     */
    public function withDescription(string $description = null): CreateStackRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string テンプレートデータ */
    private $template;

    /**
     * テンプレートデータを取得
     *
     * @return string|null スタックを新規作成
     */
    public function getTemplate(): ?string {
        return $this->template;
    }

    /**
     * テンプレートデータを設定
     *
     * @param string $template スタックを新規作成
     */
    public function setTemplate(string $template = null) {
        $this->template = $template;
    }

    /**
     * テンプレートデータを設定
     *
     * @param string $template スタックを新規作成
     * @return CreateStackRequest $this
     */
    public function withTemplate(string $template = null): CreateStackRequest {
        $this->setTemplate($template);
        return $this;
    }

}